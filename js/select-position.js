(function(w,d){
    var checked = [];
    var order = d.querySelector('#order');
    var orderBtn = d.querySelector('#reserve-btn');

    d.querySelector('#session_id').addEventListener('change', function () {
        window.location.pathname = '/select/' + this.value;
    });

    let updatePositionsView = function (checked) {
        let positions = '';
        for (let c in checked) {
            positions += '<li>' + checked[c].row + ' ряд ' + checked[c].seat + ' місце</li>';
        }
        d.querySelector('#positions').innerHTML = positions;
    };

    let checkSeat = function () {
        if (this.classList.contains('reserved')) return;

        let seat = this.getAttribute('data-seat');
        let row = this.closest('[data-row]').getAttribute('data-row');

        let resetCheck = false;
        for (let c in checked) {
            if (checked[c].row == row && checked[c].seat == seat) {
                resetCheck = true;
                checked.splice(c, 1);
                break;
            }
        }

        if (resetCheck) {
            this.classList.remove('active');
        } else {
            if (checked.length >= 4) {
                alert('Ви не можете забронювати більше 4 місць');
                return;
            }
            checked.push({row, seat});
            this.classList.add('active');
        }

        if (!checked.length) orderBtn.disabled = 'disabled';
        else orderBtn.removeAttribute('disabled');

        updatePositionsView(checked);

        order.value = JSON.stringify(checked);
    };

    let seats = d.querySelectorAll('.hall-seat');
    Array.from(seats).map(function(e,i){
        e.addEventListener('click', checkSeat);
    });
})(window,document);