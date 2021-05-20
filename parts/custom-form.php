
<div class="divParam shadowed">

    <div class="logoFrame">
        <div class="logoParam"></div>
    </div>

    <div id="params">
        <div class="headingMenu">
            <h5>change theme</h5>
            <button class="cross"></button>
        </div>
        <div class="form">  
            <form action="" method="post">
                <div class="section-input">
                    <p>thema</p>
                    <label class="switch">
                        <?php if($_SESSION['mySwitch'] == "on"):?>
                            <input name="mySwitch" type="checkbox" checked>
                            <span class="slider"></span>
                        <?php else :?>
                            <input name="mySwitch" type="checkbox">
                            <span class="slider"></span>
                        <?php endif;?>
                    </label>
                </div>
                <input class="submit" type="submit" value="save changes">
            </form>
            <form name="robby">
                <div class="section-input">
                    <label for="test">bullets</label>
                    <select name="test">
                        <option value="0">regular</option>
                        <option value="1">numbers</option>
                    </select>
                </div>
                <input class="submit" type="button" value="save" />
            </form>
        </div>
    </div>
    <?php require('menu-phone.php'); ?>
</div>