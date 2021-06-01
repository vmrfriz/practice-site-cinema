export function file() {
    let el = (id) => {
        return document.getElementById(id);
    };

    let post = (url, data) => {
        return new Promise(function (resolve, reject) {
            let d = new FormData(), i;
            for (i in data) {
                if (!data.hasOwnProperty(i)) continue;
                d.append(i, data[i]);
            }
            let xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.onload = function () {
                if (this.status >= 200 && this.status < 300) {
                    resolve(xhr.response);
                } else {
                    reject({
                        status: this.status,
                        statusText: xhr.statusText
                    });
                }
            };
            xhr.onerror = function () {
                reject({
                    status: this.status,
                    statusText: xhr.statusText
                });
            };
            xhr.send(d);
        });
    };

    let fileUpload = (file, type, name) => {
        return post(
            'module/file.php',
            {
                'file' : file,
                'type' : type,
                'name' : name
            }
        )
    }

    // el('fileToUpload').addEventListener('input', async function (evt) {
    //     const allowedExtensions =  ['txt'],
    //           sizeLimit = 15728640;
    //     let file = this.files[0];
    //     const fileExtension = file.name.split(".").pop();
    //     let name = el('name').value;
    //     if(!allowedExtensions.includes(fileExtension)){
    //         alert("Неподдерживаемый тип файла!");
    //         this.value = null;
    //     }else if(file.fileSize > sizeLimit){
    //         alert("Файл слишком большой! (файл должен быть < 15Mb)")
    //         this.value = null;
    //     } else {
    //         let response = JSON.parse(await fileUpload(file, 'text', name));
    //         el('count').value = response.count;
    //         el('curr_count').value = response.count;
    //         el('fileName').value = response.name;
    //     }
    // });

    el('imgToUpload').addEventListener('input', async function (evt) {
        const allowedExtensions =  ['png', 'jpeg'],
            sizeLimit = 15728640;
        let file = this.files[0];
        const fileExtension = file.name.split(".").pop();
        let name = el('name').value;
        if(!allowedExtensions.includes(fileExtension)){
            alert("Неподдерживаемый тип файла!");
            this.value = null;
        }else if(file.fileSize > sizeLimit){
            alert("Файл слишком большой! (файл должен быть < 15Mb)")
            this.value = null;
        } else {
            let response = JSON.parse(await fileUpload(file, 'image', name));
            el('imgName').value = response.name;
        }
    });

}