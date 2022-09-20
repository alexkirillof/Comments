<!DOCTYPE html>
<html>

<head>
    <title>Add comments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="comments" class="container mb-3">
      <div class="d-flex flex-column justify-content-center mb-3">
        <img src="src/fanArt.jpg" alt="fanArt img" width="480px" class="mt-5">
        <table class="table table-bordered table-striped mt-5">
            <thead>
                <th>Name</th>
                <th>Comment</th>
                <th>Date</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <tr v-for="comment in comments">
                    <td>{{ comment.name }}</td>
                    <td>{{ comment.comment }}</td>
                    <td>{{ comment.date }}</td>
                    <td class="d-flex justify-content-center"><button class="btn-danger" @click="deleteComment(comment.id)">x</button></td>
                </tr>
            </tbody>
        </table>

        <div class="col-md-4">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" v-model="newComment.name" required>
            </div>
            <div class="form-group">
                <label>Comment:</label>
                <input type="text" class="form-control" v-model="newComment.comment" required>
            </div>
            <button class="btn btn-primary " @click="insertComment"><span class="glyphicon glyphicon-floppy-disk"></span> Add</button>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
</body>

</html>