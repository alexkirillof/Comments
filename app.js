var app = new Vue({
    el: '#comments',
    data: {
        comments: [],
        newComment: { id: '', name: '', comment: '' },
    },
    mounted: function() {
        this.fetchComments();
    },

    methods: {
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
        deleteComment: function(id) {
            axios.post('connect.php?action=delete', { id: id })
                .then(function(response) {
                    app.newComment = ''
                    app.fetchComments();
                })
        }
    }
})