    <header>
        <nav>
            <div>
                <a href="/">Home</a>
                <?php 
                    if($_SESSION['prenom']){
                        ?>
                            <a href="/assets/admin/recettes">Recettes</a>
                            <a href="/assets/admin/ingrédients">Ingrédients</a>
                        <?php
                    }
                ?>
            </div>
            <?php
                //   echo(basename($_SERVER['PHP_SELF']));
                if(basename($_SERVER['PHP_SELF']) == "index.php"){
                    ?>

                    <div>
                        <p>moteur</p>
                    </div>

                    <?php
                }

            ?>
            <details>
                <summary style="">
                    <img src="/assets/img/user.png" alt="" style="">
                    <p> <?php if(isset($_SESSION['prenom'])){ echo(" &nbsp;  ".$_SESSION['prenom']);} ?></p>
                </summary>
                <?php 
                if($_SESSION['prenom']){
                    ?>
                        <a href="/assets/admin/profil">Profil</a>
                        <a href="/assets/scripts/logout">Logout</a>
                    <?php
                }else{
                    ?>
                        <a href="/assets/pages/login">Login</a>
                    <?php
                }
                ?>
            </details>
        </nav>
    </header>

  

