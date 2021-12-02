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
        //await this.contractLoadDetails();
        this.setupEvents();
      }

      setupEvents() {
        document
          .querySelector("#mintBtn")    
          .addEventListener("click", this.mintNFT.bind(this));
    
        const contract = new ethers.Contract(
          this.contractAddress,
          this.contractAbi,
          this.provider
        );
            
        //contract.on("Investment", (from, value) => {
            //console.log(
              //`New investment from ${from} for ${ethers.utils.formatEther(value)}`
            //);
          //});
      }

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
        const contractWithSigner = await contract.connect(this.signer);
        const tx = await contractWithSigner.mintNFT(img, price)//tokenUri en price
        await tx.await();
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
console.log("het werkt!");