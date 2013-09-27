<div class="container well span8">
    <h2>Welcome to Your Profile!</h2>

        <p>
            Please make sure that you all your information updated so that you have better
            chances of getting an interview, also make sure that you upload your documents 
            so that we can verify your information and check whether you meet the minimum 
            requirements.
        </p>
        <p>
            If you do not see some information about you, instead you see a form that asks 
            you to enter information. That means you haven't entered it at all, so please 
            go through all the forms and fill up your information.
        </p>
        <p>
            Thank you for using our system, have fun!
        </p>
        <p>
            ID Number: <?php echo $this->session->userdata('id_number'); ?>
            <br>
            Name: <?php echo $this->session->userdata('name'); ?>
            <br>
            Surname: <?php echo $this->session->userdata('surname'); ?>
            <br>
            
        </p>
</div>