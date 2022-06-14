<div class="content">
          <div class="animated fadeIn">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">
                                  <h1>แบบประเมิน</h1>
                              </strong>
                              <div class="row form-group">
                                  <div class="col-12 col-md-3">
                                      <!-- <select name="assessment" id="assessment" class="form-control form-control">
                                               <option value="0"></option>
                                               <option value="1">กลางภาค</option>
                                               <option value="2">ปลายภาค</option>
                                      </div>
                                          </select> -->
                                      <select name="evalution" id="evalution">
                                          <option value="">กรุณาเลือก</option>
                                          <?php foreach($result_evalution_type as $value){?>
                                          <option value="<?=$value['evalution_id']?>">
                                              <?=$value['evalution_question_form_detail']?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="card-body">
                              <table id="example" class="table table-striped table-bordered">

                                  <thead>
                                      <tr>
                                          <td width="19%">หมวดหมู่</td>
                                          <td width="15%">อายุพัฒนาการ</td>
                                          <td width="3%">ข้อที่</td>
                                          <td width="25%">รายการ</td>
                                          <td width="18%">ผลการประเมิน</td>
                                          <td width="18%">หมายเหตุ</td>
                                      </tr>
                                  </thead>

                                  <tbody>
                                      <form name="form_input" id="form_input">
                                          <?php $a = ""; $b = "";$i = 1; foreach($result as $row){ ?>
                                          <tr>
                                              <td><?php if ($a != $row['e_detail'] ) { ?>
                                                  <?php $count_header = $row['id']; echo $row['e_detail']; ?></td>
                                              <?php }else{ ?>
                                              <?php echo ""; ?>
                                              <?php } $a = $row['e_detail']; ?>
                                              </td>

                                              <td><?php if ($b != $row['i_detail'] ) { ?>
                                                  <?php echo $row['i_detail']; ?><?php }else{ ?>
                                                  <?php echo ""; ?>
                                                  <?php } $b = $row['i_detail']; ?></td>

                                              <td><?php echo $i; $i++?></td>
                                              <td><?php echo $row['q_detail'];?></td>
                                              <td>
                                                  <input id="afi" value="<?php echo $row['afi'] ?>" type="hidden" />
                                                  <input type="radio" id="<?php echo $row['q_id'] ?>"
                                                      name="radio_<?php echo $row['q_id'] ?>"
                                                      value="<?php echo $row['q_id'] ?>,Y">
                                                  <label for="javascript">ผ่าน</label><br>
                                                  <input type="radio" id="<?php echo $row['q_id'] ?>"
                                                      name="radio_<?php echo $row['q_id'] ?>"
                                                      value="<?php echo $row['q_id'] ?>,N">
                                                  <label for="javascript">ไม่ผ่าน</label>
                                              </td>
                                              <td></td>
                                          </tr>
                                          <?php } ?>
                                      </form>
                                  </tbody>
                              </table>
                              <?php if ($min_value != null){ ?>
                              <div class="col-md-6"> <button class="button" name="min_value" id="min_value"
                                      onclick="getValue()" value="<?php echo($min_value) ?>"> Prev </button> </div>
                              <?php } ?>
                              <?php if ($max_value != null){?>
                              <div class="col-md-6"> <button class="button max_value" name="max_value" id="max_value"
                                      value="<?php echo($max_value) ?>"> Next </button> </div>
                              <?php } else if ($max_value == null){  ?>
                              <center>
                                  <form><input onclick="getValue()" value="บันทึก" button type="button"
                                          class="btn btn-primary btn-sm" id="submit" name="submit"></form>
                              </center>
                              <?php } ?>
                          </div>
                      </div>
                  </div>


              </div>
          </div><!-- .animated -->
      </div><!-- .content -->
