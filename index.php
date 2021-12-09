<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


</head>

<body>
    <button id="btnBack"> back </button>
    <div id="main">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th> Details </th>
                </tr>
            </thead>
            <tbody id="tblPosts">
            </tbody>
        </table>
    </div>

    <div id="detail">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th> Author </th>
                </tr>
            </thead>
            <tbody id="tbldetails">
            </tbody>
        </table>
    </div>

    <div id="comment">
        <table>
            <head>
                <tr>
                   <th>postId</th>
                   <th>id</th>
                   <th>name</th>
                   <th>body</th>
                   <th>email</th>
                   <button onClick='showcomment(" +.id + ");' > comment </button>
                 </tr>
                </head>
                <tbody id="tblcomment"></tbody>
             </tbody>
        </table>
    </div>
    <div id="main1">
        <table>
            <thead>
                <th>postId</th><br/>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>body</th>

            </thead>
            <tbody id="tblPost1">
            </tbody>
        </table>
    </div>


</body>

<script>
    function showDetails(id) {
        $("#main").hide();
        $("#detail").show();
        var url = "https://jsonplaceholder.typicode.com/posts/" + id 
        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='details'";
                line += "<td>" + data.id + "</td>"
                line += "<td><b>" + data.title + "</b><br/>"
                line += data.body + "</td>";
                line += "<td>" + data.userId + "</td>"
                line += "</tr>";
                    $("#tbldetails").append(line);
                })
            
            .fail((xhr, status, error) => {

            });
    }
    function showcomment(id) {
        $("#main").hide();
        $("#comment").show();
        var url = "https://jsonplaceholder.typicode.com/posts/"+id+"/comments"
        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='comment'";
                    line += "<td><b>" + data.id + "</b><br/>"
                    line += "<td><b>" + data.name + "</b><br/>"
                    line += "<td><b>" + data.email + "</b><br/>"
                    line += "<td><b>" + data.body + "</b><br/>"
                    line += "<td>" + data.postId + "</td>"
                    line += "</tr>";
                    $("#tblcomment").append(line);
             
            })
            .fail((xhr, status, error) => {

            })  
                
    }
    function loadPosts() {
        $("#main").show();
        $("#details").hide();
        $("#main1").hide();

        var url = "https://jsonplaceholder.typicode.com/posts"
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    console.log(item);
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>";
                    line += "<td><b>" + item.title + "</b><br/>";
                    line += item.body + "</td>";
                    line += "<td> <button onClick='showDetails(" + item.id + ");' > link </button> </td>";
                    line += "</tr>";
                    $("#tblPosts").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, status, error) => {

            })
    }
    function LoadPosts1() {
        $("#main").hide();
        $("#comment").hide();
        $("main1").show();
        var url = "https://jsonplaceholder.typicode.com/comments"
        $.getJSON(url)
            .done((data) => {
              $.each(data, (k, item) => {
                    var line = "<tr>";
                    line += "<td>" + item.postId + "</td>"
                    line += "<td><b>" + item.id + "</b><br/>"
                    line += "<td><b>" + item.name+ "</b><br/>"
                    line += "<td><b>" + item.email + "</b><br/>"
                    line +=  item.body+ "</td>"
                    line += "</tr>";
                    $("#tblPost2").append(line);
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {
            })
    }
    

    $(() => {

        loadPosts();
        $("#detail").hide();
        $("#main").show();
        $("#main2").hide();
            $("#btnBack").click(() => {
            $("#main").show();
            $("#details").remove();
    
        });

        
    
        });

</script>






</html>
