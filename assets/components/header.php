    <header>
        <nav>
            <div>
                <a href="/">Home</a>
                <?php 
                
                    if($_SESSION['prenom']){
                        ?>
                            <a href="/assets/admin/ingrédients">Ingrédients</a>
                            
                            
                        <?php
                    }
                ?>
            </div>


            <details>
                <summary style="">
                    <img src="/assets/img/user.png" alt="" style="">
                    <p> <?php if($_SESSION['prenom']){ echo(" &nbsp;  ".$_SESSION['prenom']);} ?></p>
                </summary>



                

                <?php 
                
                if($_SESSION['prenom']){
                    ?>
                        <a href="/assets/admin/profil">Profil</a>
                        <a href="/assets/admin/recettes">Recettes</a>
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

