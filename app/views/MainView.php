<?php include __DIR__ . '/NavbarView.php'; ?>

<main role="main" class="container">
    <div class="starter-template">

        <table class="table table-bordered">
            <thead>Stundenerfassung</thead>
            <tbody>
                <?php
                    foreach ($variables['main']['times'] as $variable) {
                        foreach ($variable as $key => $value) {
                            echo "<tr>";
                            echo "<td>$key</td>";
                            echo "<td>$value</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <form action=<?php echo $variables['main']['action']; ?> method="POST">
            <input class="input-group" type="text" name="startTime"><br>
            <input class="input-group" type="text" name="endTime"><br>
            <button type="submit">Speichern</button>
        </form>
    </div>
</main>
