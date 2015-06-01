<div class="noticeFases">
    <h3>Fases:</h3>
    <ol>
        <li>votació 1-5</li>
        <li>recompte 1-5</li>
        <li>votació 6-11</li>
        <li>recompte 6-11</li>
    </ol>
</div>

<div class="notes">
    <h3>Notes:</h3>
    <pre><?include('README');?></pre>
</div>

<div class="notes">
    <h3>Falta:</h3>
    <pre><?include('TODO');?></pre>
</div>

<div class="formHolder">

    <form class="navbar-form navbar-left setup-form" role="setup" action="controllers/setup.php" method="post">

        <div class="form-group">
            <fieldset>
                <label for="taula">Taula:</label>
                <input name="taula" id="taula" type="text">
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <label for="fase">Fase:</label>
                <input name="fase" id="fase" type="text">
            </fieldset>
        </div>
        <div class="form-group">
            <button type="submit" class="send-button btn btn-default">Començar</button>
        </div>
    </form>
</div>
