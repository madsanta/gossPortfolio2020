$('.del-btn').on('click', function () {
    /*data: {
        title: 'Test',
            categories: 'Test',
            content: 'TEST TEST TEST'
    },*/
    console.log(this.value);
    $.ajax({
        url: '/api/posts/' + this.value,
        type: 'DELETE',
        success: function (result) {
            console.log(result);
        },
        error: function (result) {
            alert('Could not delete!');
        }
    });
    this.parentNode.parentNode.removeChild(this.parentNode);
});

$('#create-btn').on('click', function () {
    $.ajax({
        url: '/api/posts',
        type: 'POST',
        data: {
            title: $('#title').val(),
            categories: $('#categories').val(),
            content: $('#content').val()
        },
        success: function (result) {
            alert(result);
        },
        error: function (result) {
            alert('Could not delete!');
        }
    });
});