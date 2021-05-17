export function delete_item() {
    let select = document.querySelectorAll(".delete_item");
    select.forEach(function (item) {
        item.addEventListener("click", function () {
            let status = confirm('Подтвердите удаление!');
            if (status) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", 'module/delete_item.php', true);

                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
                    if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                        // Запрос завершён. Здесь можно обрабатывать результат.
                        alert("Удаление завершено!");
                        document.location.reload();
                    }
                }
                xhr.send("id="+item.dataset.id+"&item="+item.dataset.item);
            }
        });
    })
}