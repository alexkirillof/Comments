var app = new Vue({
    el: '#comments',
    data: {
        comments: [],
        newComment: { name: '', comment: '' },
    },
    mounted: function() {
        this.fetchComments();
    },

    methods: {
        keymonitor: function(event) {
            if (event.key == "Enter") {
                app.insertComment();
            }
        },
        fetchComments: function() {
            axios.post('connect.php')
                .then(function(response) {
                    app.comments = response.data.comments;
                });
        },
        insertComment: function() {
            var commentForm = app.toFormData(app.newComment)
            axios.post('connect.php?action=add', commentForm)
                .then(function(response) {
                    console.log(response);
                    app.newComment = { name: '', comment: '', date: '' };
                    app.fetchComments();
                })
        },
        toFormData: function(obj) {
            var form_data = new FormData();
            for (var key in obj) {
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
    }
})