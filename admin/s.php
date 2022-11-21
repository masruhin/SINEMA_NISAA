                      <div div class="form-group row">
                      <div class="col-sm-4 col-form-label">
                          <label for="fak_kode"><strong>Kode Fakultas </strong></label>
                      </div>
                      <div class="col-sm-8">
                          <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i data-feather="award"></i>
                                  </span>
                              </div>
                              <input
                                  type="text"
                                  id="fak_kode"
                                  class="form-control"
                                  name="fak_kode"
                                  placeholder="Isikan dengan nama Universitas" value="<?= $row['fak_kode']?>"/>
                          </div>
                      </div>
                      </div>
											<div class="form-group row">
                      <div class="col-sm-4 col-form-label">
                          <label for="fak_nama"><strong>Nama Fakultas </strong></label>
                      </div>
                      <div class="col-sm-8">
                          <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i data-feather="award"></i>
                                  </span>
                              </div>
                              <input
                                  type="text"
                                  id="fak_nama"
                                  class="form-control"
                                  name="fak_nama"
                                  placeholder="Isikan dengan nama Universitas" value="<?= $row['fak_nama']?>"/>
                          </div>
                      </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="fak_ket"><strong> Keterangan </strong></label>
                          </div>
                          <div class="col-sm-8">
                              <div class="input-group input-group">
                                <textarea class="form-control" id="" name="fak_ket" colspan="4" rows="3" placeholder="Alamat Universitas"><?= $row['fak_ket']?>
                              </textarea>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="date_created"><strong> Tgl diBuat </strong></label>
                          </div>
                          <div class="col-sm-8">
                              <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i data-feather="phone-call"></i>
                                      </span>
                                  </div>
                                  <input
                                      type="text"
                                      id="date_created"
                                      class="form-control"
                                      name="date_created"
                                      placeholder="Masukan No Telpon" value="<?= $row['date_created']?>"/>
                              </div>
                          </div>
                      </div>