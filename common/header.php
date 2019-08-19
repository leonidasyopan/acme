<figure>
    <a href="https://acme.leonidasyopan.com/" title="ACME Logo - Homepage"><img src="/images/site/logo.gif" alt="ACME Logo"></a>
</figure>

<div class="my-account-link">
    <?php 
        if(isset($_SESSION['loggedin'])){
    ?>        
    <a href="/accounts/" title="Admin Page"><?php echo "<span>Welcome ". $_SESSION['clientData']['clientFirstname'] . "</span>"; ?></a>
    <?php } ?>
    
    <?php if(isset($cookieFirstname)){
        echo "<span>Welcome $cookieFirstname</span>";
    }
    ?>
    <?php 
    if(!isset($_SESSION['loggedin'])){
    ?>        
    <a href="accounts/?action=login" title="My Account Dashboard"><img src="/images/site/account.gif" alt="My Acoount Icon">
    My Account</a>
    <?php } ?>
    <?php 
    if(isset($_SESSION['loggedin'])){
    ?>        
    <a href="/accounts/?action=Logout" title="Log Out">Log Out</a>
    <?php } ?>
</div>
