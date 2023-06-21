let updateBtn = document.querySelector("#update_img");
let Cancel_updateBtn = document.querySelector("#cancel_update_img");
let input = document.querySelector("#photo");

updateBtn.addEventListener("click", (e) => {
    e.preventDefault();
    updateBtn.style.display = "none";
    Cancel_updateBtn.style.display = "block";
    input.style.display = "block";
});

Cancel_updateBtn.addEventListener("click", (e) => {
    e.preventDefault();
    updateBtn.style.display = "inline";
    Cancel_updateBtn.style.display = "none";
    input.style.display = "none";
});
