const fileInput = document.getElementById("Proof");
const fileBtn = document.getElementById("Upload-btn");

fileInput.addEventListener("change", function () {
    const file = this.files[0];

    if(file){
        fileBtn.innerText = file.name;
    }else{
        fileBtn.innerText = "Upload File";
    }
});