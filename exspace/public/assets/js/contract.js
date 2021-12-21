class App {
    constructor(){
        this.contractAddress = "0x76d463D9CA4CAE1Fd478d62e9914A6b6Cc2b604e";
        this.contractAbi = "";
        this.account = "";
        this.provider = "";
        this.signer = "";
        this.loggedin = false;
        this.launch();
    }


    async launch() {
        await this.loginWithMetaMask();
        await this.loadAbi();
        this.setupEvents();
      }

      setupEvents() {
        document
          .querySelector("#mintBtn")    
          .addEventListener("click", this.mintNFT.bind(this));

        document.querySelector("#forSale").addEventListener("click", this.putUpForSale.bind(this));
        document.querySelector("#buyNFT").addEventListener("click", this.buyNFT.bind(this));
      }

        //PUT NFT FOR SALE FUNCTION
        async putUpForSale(){
          console.log("Loading the contract code.");
          let p = document.querySelector("#nft_price").innerHTML;//price van nft
          let price = parseInt(p);
          let dataAttribute = document.querySelector("#dataAttribute3");
          let tokenid = dataAttribute.dataset.tokenid; //deze tokenID komt uit de database en is gelinkt als data-attribute

          console.log(price);
          console.log(tokenid);
          const contract = new ethers.Contract(
            this.contractAddress,
            this.contractAbi,
            this.provider
          );
          const contractWithSigner = await contract.connect(this.signer);
          const tx = await contractWithSigner.putUpForSale(tokenid, price)//tokenId en price
          await tx.wait().then(res=> {
            console.log(res);
          });

        }

        //BUY NFT FUNCTION
        async buyNFT(){
          console.log("Loading the contract code.");
          let dataAttribute = document.querySelector("#dataAttribute3");
          let tokenid = dataAttribute.dataset.tokenid; //deze tokenID komt uit de database en is gelinkt als data-attribute
          console.log(tokenid);

        
          const contract = new ethers.Contract(
            this.contractAddress,
            this.contractAbi,
            this.provider
          );
          const contractWithSigner = await contract.connect(this.signer);
          const tx = await contractWithSigner.buyNFT(tokenid)
          await tx.wait().then(res=> {
            console.log(res);
          });
        }

        //MINT NFT FUNCTION 
        async mintNFT(){
        console.log("Loading the contract code.");
        let img = document.querySelector("#nft_image").src;
        let p = document.querySelector("#nft_price").innerHTML;
        let price = parseInt(p);
        //console.log(price, img);
        const contract = new ethers.Contract(
          this.contractAddress,
          this.contractAbi,
          this.provider
        );

        let tokenId;
        const contractWithSigner = await contract.connect(this.signer);
        const tx = await contractWithSigner.mintNFT(img, price)//tokenUri en price
        await tx.wait().then(res=> {
          console.log(res);
          let tokentIdString = res['events'][0]['topics'][3]; //geeft tokenId terug als hexadecimal
          console.log(tokentIdString);
          tokenId = ethers.BigNumber.from(tokentIdString).toString();
          console.log(tokenId);
          
          let nft =document.querySelector("#dataAttribute"); 
          let dataAttribute = document.querySelector("#dataAttribute2");
          const form = document.createElement('form');
          form.method = "POST";
          
          let NFTId = dataAttribute.dataset.nftid; //deze tokenID komt uit de database en is gelinkt als data-atribute
          console.log(NFTId);
          let csrf_token = nft.dataset.csrf; //dit is de @CSRF token om csrf aanvallen te voorkomen
          const hiddencsrf = document.createElement('input'); //via een hiddenform slagen we de tokenID op in de DB
          hiddencsrf.type = 'hidden'
          hiddencsrf.name = '_token'
          hiddencsrf.value = csrf_token;

          form.appendChild(hiddencsrf);
          document.body.appendChild(form);
          form.action = `/nft/addTokenId/${NFTId}/${tokenId}`
          form.submit();
        });
        console.log("je hebt een nft gemint, let's go!");
      }

      async loadAbi() {
        console.log("Loading the contract code.");
        return (this.address = fetch("../abi/abi.json") 
          .then((response) => {
            return response.json();
          })
          .then((json) => {
            this.contractAbi = json;
            console.log("Contract loaded, you can now buy, mint and sell NFT's. nice!");
          }));
      }

      async loginWithMetaMask() {
        // https://docs.metamask.io/guide/getting-started.html
        if (typeof window.ethereum !== "undefined") {
          const accounts = await ethereum.request({
            method: "eth_requestAccounts"
          });
          this.account = accounts[0];
          console.log(`Cool, we're connected to ${this.account}`);
          await this.setupProvider();
        }
      }

      async setupProvider() {
        this.provider = await new ethers.providers.Web3Provider(window.ethereum);
        this.signer = this.provider.getSigner();
      }
}

let NFTApp = new App();