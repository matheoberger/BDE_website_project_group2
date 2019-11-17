<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no" />
    <title>BDE CESI Bordeaux</title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

</head>


<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Publier une image sur l'événement</h2>
            </div>

            <div class="panel-body">
                <form action="/addpicture/{{$id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Envoyer</button>
                        </div>
                    </div>
                </form>
                <?php if (isset($error) && isset($color)) {
                    echo "<p style='color:$color'> $error </p>";
                } ?>
            </div>
        </div>
    </div>
</body>

</html>