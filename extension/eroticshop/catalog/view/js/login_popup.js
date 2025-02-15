document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form-login-popup');
    const alertPopup = document.getElementById('alert-popup');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else if (data.error) {
                    alertPopup.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                } else {
                    alertPopup.innerHTML = `<div class="alert alert-success">${data.success}</div>`;
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});