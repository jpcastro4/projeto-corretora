
        
        <div class="section">
            <div class="container">
                <div class="button-container">
                    <a href="<?php echo base_url('settings/profile')?>" class="btn btn-primary btn-round btn-lg">Profile</a>
                    <a href="<?php echo base_url('settings/password')?>" class="btn btn-primary btn-round btn-lg">Password</a>
                    <a href="<?php echo base_url('settings/wallets')?>" class="btn btn-primary btn-round btn-lg">Wallet's</a>
                </div>
            </div>
            <div class="container pt-5"	style="max-width: 600px">
                 
                <h2 class="text-center">Change your password</h2>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card text-center">
                            <div class="card-block p-5">                          
                                <form class="form-group">
                                	<div class="input-group form-group-no-border input-lg">
		                                <span class="input-group-addon">
		                                    <i class="now-ui-icons users_single-02"></i>
		                                </span>
		                                <input type="text" name="usuarioNome" class="form-control" placeholder="Current password">
		                            </div>
		                            <div class="input-group form-group-no-border input-lg">
		                                <span class="input-group-addon">
		                                    <i class="now-ui-icons users_single-02"></i>
		                                </span>
		                                <input type="text" name="usuarioSobrenome" class="form-control" placeholder="New password">
		                            </div>
		                            <div class="input-group form-group-no-border input-lg">
		                                <span class="input-group-addon">
		                                    <i class="now-ui-icons ui-1_email-85"></i>
		                                </span>
		                                <input type="email" name="usuarioEmail" class="form-control" placeholder="Repeat new password">
		                            </div>
		                            <button class="btn btn-primary btn-round btn-lg" id="formsave">Save new pass</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>

                 
            </div>
        </div>
