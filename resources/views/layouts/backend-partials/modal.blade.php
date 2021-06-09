                  <!-- Share Modal -->
                  <div id="shareModal" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered">
                       <!-- Modal Content -->
                       <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header border-0 p-0">
                             <!-- Attachments -->
                             <div class="attachment">
                                <div class="media align-items-center">
                                   <div class="mr-2">
                                      <img src="{{ asset('backend/assets/img/png-icon/file3.png')  }}" class="radius-10" alt="">
                                   </div>
                                   <div class="media-body ie-flex-basis pl-1">
                                      <h4 class="file-name mb-1">Photoshop_psd_File.psd</h4>
                                      <p class="file-size font-14 bold c4 l-height1 m-0">26.4mb</p>
                                   </div>
                                </div>
                             </div>
                             <!-- End Attachments -->

                             <!-- Modal Close -->
                             <div class="modal-close" data-dismiss="modal">
                                <img src="{{ asset('backend/assets/img/svg/close.svg')  }}" alt="" class="svg">
                             </div>
                             <!-- End Modal Close -->
                          </div>
                          <!-- End Modal Header -->

                          <!-- Modal Body -->
                          <div class="modal-body p-0 mt-3">
                             <!-- Form Group -->
                             <div class="form-group mb-4">
                                <h6 class="mb-10">Shared with</h6>
                                <div class="input-wrap d-flex align-items-center flex-wrap w-100">
                                   <span>Sandra Jones <img src="{{ asset('backend/assets/img/svg/table-colse.svg')  }}" alt="" class="svg"></span>
                                   <div><input class="theme-input-style style--two" type="email" placeholder="User name or email"></div>

                                   <!-- Dropdown Button -->
                                   <div class="dropdown-button">
                                      <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                         <div class="menu-icon mr-2">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                         </div>
                                      </a>
                                      <div class="dropdown-menu checkbox checkbox2 dropdown-menu-right">
                                         <div class="item-list">
                                            <!-- Custom Checkbox -->
                                            <label class="custom-checkbox">
                                               <input type="checkbox" checked>
                                               <span class="checkmark"></span>
                                            </label>
                                            <!-- End  Custom Checkbox -->
                                            View
                                         </div>
                                         <div class="item-list">
                                            <!-- Custom Checkbox -->
                                            <label class="custom-checkbox">
                                               <input type="checkbox">
                                               <span class="checkmark"></span>
                                            </label>
                                            <!-- End  Custom Checkbox -->
                                            Comment
                                         </div>
                                         <div class="item-list">
                                            <!-- Custom Checkbox -->
                                            <label class="custom-checkbox">
                                               <input type="checkbox">
                                               <span class="checkmark"></span>
                                            </label>
                                            <!-- End  Custom Checkbox -->
                                            Edit
                                         </div>
                                      </div>
                                   </div>
                                   <!-- End Dropdown Button -->
                                </div>
                             </div>
                             <!-- End Form Group -->

                             <!-- Get Shareable Link -->
                             <div class="form-group get-shareable-link mb-4">
                                <h6 class="mb-10">Shareable Link</h6>
                                <div class="input-wrap theme-input-group w-100">
                                   <input class="theme-input-style" id="get-link" type="text" value="https://drive.google.com/file/d/1J1TRNaPJSCG5VGHPHMldQTx5KWC/vie" readonly>

                                   <!-- Copy Button -->
                                   <a href="#" id="copy-link-btn">
                                      <img src="{{ asset('backend/assets/img/svg/copy.svg')  }}" alt="" class="svg">
                                   </a>
                                   <!-- End Copy Button -->
                                </div>
                             </div>
                             <!-- End Get Shareable Link -->

                             <!-- Form Group -->
                             <div class="form-group comment">
                                <h6 class="mb-10">Comment</h6>

                                <div class="d-flex">
                                   <!-- Avatar -->
                                   <div class="mr-3">
                                      <a href="#"><img src="{{ asset('backend/assets/img/avatar/m14.png')  }}" class="img-40" alt=""></a>
                                   </div>
                                   <!-- End Avatar -->

                                   <!-- Form -->
                                   <form action="#" method="POST" class="flex-grow radius-10 l-height1">
                                      <textarea class="theme-input-style style--three" placeholder="Your Comment"></textarea>
                                   </form>
                                   <!-- End Form -->
                                </div>
                             </div>
                             <!-- End Form Group -->

                             <!-- Share Actions -->
                             <div class="share-actions d-flex justify-content-between align-items-center pt-1">
                                <a href="#" class="link-btn bold c2"><span>Add</span> Comment <i class="icofont-arrow-right"></i></a>
                                <a href="#" class="btn">Share Now</a>
                             </div>
                             <!-- End Share Actions -->
                          </div>
                          <!-- End Modal Body -->

                       </div>
                       <!-- End Modal Content -->
                    </div>
                 </div>
                 <!-- End Share Modal -->
