const userProfile = document.getElementById("userProfile");
const profileDropdown = document.getElementById("profileDropdown");

userProfile.addEventListener("click", function (e) {
    e.stopPropagation();
    profileDropdown.classList.toggle("show");
});

// Fermer le menu si on clique ailleurs
document.addEventListener("click", function () {
    profileDropdown.classList.remove("show");
});
