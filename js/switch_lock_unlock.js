
document.getElementById('statusSwitch').addEventListener('change', function() {
    var statusSpan = document.getElementById('cardStatus');
    if (this.checked) {
        statusSpan.textContent = 'Bloqueada';
    } else {
        statusSpan.textContent = 'Desbloqueada';
    }
});

// Set the initial state to "Desbloqueada"
window.onload = function() {
    document.getElementById('statusSwitch').checked = false;
    document.getElementById('cardStatus').textContent = 'Desbloqueada';
};
