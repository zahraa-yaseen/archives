function toggleClass() {
    var element = document.getElementById("show_file-image");
    element.style.display = 'block';
} 

 
document.addEventListener('DOMContentLoaded', function () {
    var checkbox = document.getElementById('exampleCheck1');
    
    checkbox.addEventListener('change', function () {
        var isChecked = checkbox.checked;

        // تحقق من حالة الصلاحية وقم بتحديث الأزرار بناءً على ذلك
        var addBookButton = document.querySelector('[data-action="addBook"]');
        var deleteBookTypeButton = document.querySelector('[data-action="deleteBookType"]');

        if (isChecked) {
            addBookButton.style.display = 'block';
            deleteBookTypeButton.style.display = 'block';
        } else {
            addBookButton.style.display = 'none';
            deleteBookTypeButton.style.display = 'none';
        }
    });
});

