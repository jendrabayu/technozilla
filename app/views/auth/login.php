 <div class="site-section site-section-sm site-blocks-1">
     <div class="container">
         <div class="row">
             <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h4 class="m-0 pt-1 text-black text-center">Login</h4>
                     </div>

                     <div class="card-body">
                         <form method="POST" action="<?= url('auth/do_login') ?>" class="needs-validation" novalidate="">
                             <div class="form-group">
                                 <label for="email">Email</label>
                                 <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                 <div class="invalid-feedback">
                                     Please fill in your email
                                 </div>
                             </div>

                             <div class="form-group">

                                 <label for="password" class="control-label">Password</label>

                                 <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                 <div class="invalid-feedback">
                                     please fill in your password
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="custom-control custom-checkbox">
                                     <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                     <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                     Login
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="mt-3 text-muted text-center">
                     Belum Punya Akun ? <a href="<?= url('auth/register') ?>">BuatAkun</a>
                 </div>

             </div>
         </div>
     </div>
 </div>