<!DOCTYPE html>
<html>
<head>
    <title>Add comments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
    integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<div id="comments">
    <div class="container">
            <div class="col-md-8">
                    <table class="table table-bordered table-striped">
                        <img src="src/fanArt.jpg" alt="fanArt img" width="480px">
                        <thead>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            <tr v-for="comment in comments">
                                <td>{{ comment.name }}</td>
                                <td>{{ comment.comment }}</td>
                                <td>{{ comment.date }}</td>
                                <td><button>x</button></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" v-model="newComment.name" v-on:keyup="keymonitor">
                </div>
                <div class="form-group">
                    <label>Comment:</label>
                    <input type="text" class="form-control" v-model="newComment.comment" v-on:keyup="keymonitor">
                </div>
            <button class="btn btn-primary" @click="insertComment"><span class="glyphicon glyphicon-floppy-disk"></span> Add</button>   
    </div> 
 </div>
</div>
<script src="app.js"></script>
</body>
</html>