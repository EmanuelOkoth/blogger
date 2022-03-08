let delteAction = document.querySelectorAll('.delete-btn');
delteAction.forEach((el) => {
    el.onclick = function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this article?')) {
            window.location.href = e.target.href;
        }
    }
});