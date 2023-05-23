const checkbox = document.getElementById('check');
const button = document.getElementById('button');

checkbox.addEventListener('change', function () {
    button.disabled = !checkbox.checked;
});