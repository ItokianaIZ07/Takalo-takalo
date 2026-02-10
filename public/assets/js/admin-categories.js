document.addEventListener("DOMContentLoaded", function () {
    const addBtn = document.getElementById("addCategoryBtn");
    const modal = document.getElementById("categoryModal");
    const closeBtn = document.getElementById("closeCategoryModal");
    const cancelBtn = document.getElementById("cancelCategoryBtn");

    addBtn.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    cancelBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    modal.addEventListener("click", function (e) {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});
