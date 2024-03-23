document.addEventListener('DOMContentLoaded', function() {
    var panels = document.querySelectorAll('.panel');

    document.querySelector('.sidebar').addEventListener('click', function(e) {
        if (e.target.tagName === 'A') {
            var targetPanelId = e.target.getAttribute('href').substring(1);
            panels.forEach(function(panel) {
                panel.classList.remove('active');
            });
            document.getElementById(targetPanelId).classList.add('active');
        }
    });
});
