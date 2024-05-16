<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <style>
        #formwrapper {
            border: solid black;
            padding: 20px;
            margin: 50px 350px;
            position: relative;
        }
        #formtag {
            background-color: white;
            padding: 0 3px;
            position: absolute;
            top: -10%;
        }
        #form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .label {
            display: flex;
            gap: 10px;
        }
        input {
            flex-grow: 1;
            
        }
        .text {
            width: 70px;
        }
        #buttondown {
            display: flex;
            flex-direction: row-reverse;
            gap: 10px
        }
    </style>
</head>
<body>
    <div id="formwrapper">
        <span id="formtag">Upload Image</span>
        <form method="post" action="/store" id="form" enctype="multipart/form-data">
            @csrf
            <div class="label">
                <span class="text">Image</span>
                <input name="image" type="file">
            </div>

            <div id="buttondown">
                <button type="submit">Save</button>
                <a href="/gallery">
                    <button type="button">Cancel</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>