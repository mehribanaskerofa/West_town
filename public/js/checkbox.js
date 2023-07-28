$(document).ready(function () {

        $('.flexSwitchCheckChecked').on('change',function (e){
        e.preventDefault();

        if (this.checked) {
            if (confirm('active?')) {

                const url = $(this).attr('data-action');
                $.ajax({
                    method: "get",
                    url: url,
                    data: {
                        'active':1
                    },
                    success() {
                        window.location.reload();
                    }

                })
            }
        } else {
            if (confirm('disabled?')) {

                const url = $(this).attr('data-action');
                $.ajax({
                    method: "get",
                    url: url,
                    data: {
                        'active':0
                    },
                    success() {
                        window.location.reload();
                    }

                })
            }
        }

    })

});
