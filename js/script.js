let searchBox = document.getElementById("searchBox");

if (searchBox) {
    searchBox.addEventListener("keyup", function () {
        let keyword = this.value;

        let xhr = new XMLHttpRequest();
        xhr.open("GET", "ajax/search-books.php?keyword=" + keyword, true);

        xhr.onload = function () {
            document.getElementById("bookResults").innerHTML = this.responseText;
        };

        xhr.send();
    });
}