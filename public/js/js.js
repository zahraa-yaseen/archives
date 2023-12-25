function toggleClass() {
    var show_file_image = document.getElementById("show_file-image");
    var click_show_image = document.getElementById("click_show_image");
    var click_show_image2 = document.getElementById("click_show_image2");


    show_file_image.style.display = 'block';
    click_show_image.style.display = 'none';
    click_show_image2.style.display = 'block';}


function toggleClass2() {
    var show_file_image2 = document.getElementById("show_file-image2");

    var click_show_image2 = document.getElementById("click_show_image2");


  
    show_file_image2.style.display = 'block';
    click_show_image2.style.display = 'none';

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

