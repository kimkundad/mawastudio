<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../"/>
		<title>ใบแจ้งชำระเงิน</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ url('admin/assets/plugins/global/plugins.bundle.css') }}?ver=<?php time(); ?>" rel="stylesheet" type="text/css" />
		<link href="{{ url('admin/assets/css/style.bundle.css') }}?ver=<?php time(); ?>" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank">
		<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-column-fluid">
				
				<!--begin::Body-->
				<div class="scroll-y flex-column-fluid px-10 py-10" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header_nav" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true" style="background-color:#D5D9E2; --kt-scrollbar-color: #d9d0cc; --kt-scrollbar-hover-color: #d9d0cc">
					<!--begin::Email template-->
					<style>html,body { padding:0; margin:0; font-family: Inter, Helvetica, "sans-serif"; } a:hover { color: #009ef7; }</style>
					<div id="#kt_app_body_content" style="background-color:#D5D9E2; font-family:Arial,Helvetica,sans-serif; line-height: 1.5; min-height: 100%; font-weight: normal; font-size: 15px; color: #2F3044; margin:0; padding:0; width:100%;">
						<div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
								<tbody>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
											<!--begin:Email content-->
											<div style="text-align:center; margin:0 15px 34px 15px">
												<!--begin:Logo-->
												<div style="margin-bottom: 10px">
													<a href="#" rel="noopener" target="_blank">
														<img alt="Logo" src="{{ url('img/Logo_new_v1.png') }}" style="height: 55px" />
													</a>
												</div>
												<!--end:Logo-->
												<!--begin:Text-->
												<div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
													<p style="margin-bottom:9px; color:#181C32; font-size: 20px; font-weight:700">สวัสดี {{$details['name']}}</p>
													<p style="margin-bottom:9px; color:#7E8299; font-size: 18px; font-weight:700">ขอขอบคุณ</p>
													<p style="margin-bottom:2px; color:#7E8299">ที่ให้ความสนใจเข้าร่วมคอนเสิร์ตการกุศล <br> เพื่อหารายได้ช่วยเหลือมูลนิธิบ้านพระพรโดยไม่หักค่าใช้จ่าย</p>
												</div>

												<div style="margin-bottom: 15px">
													<img alt="Logo" src="{{ url('img/160428.png') }}" style="width: 100%;" />
												</div>

                                                <div style="margin-bottom: 15px">
													<img alt="Logo" src="{{ url('img/Mask_Group_14.png') }}" style="max-height: 400px; width: auto" />
												</div>
												<div style="margin-bottom: 15px">
													<img alt="Logo" src="{{ url('img/Group_93.png') }}" style="max-height: 400px; width: auto" />
												</div>
												
												<!--end:Text-->
												<!--begin:Action-->
												<a href='https://mawastudiothailand.com/plengneepeehainong/paymentNoti?ordercon={{$details['order_id']}}' target="_blank" 
                                                style="background-color:#cf4339; border-radius:6px;display:inline-block; padding:15px 22px; color: #FFFFFF; font-size: 16px; font-weight:500;">
                                                    แจ้งการชำระเงิน
                                                </a>
												<!--begin:Action-->
											</div>
											<!--end:Email content-->
										</td>
									</tr>
                                    
									<tr style="display: flex; justify-content: center; margin:0 60px 35px 60px">
										<td align="start" valign="start" style="padding-bottom: 10px;">
											<p style="color:#181C32; font-size: 18px; font-weight: 600; margin-bottom:13px">ขั้นตอนการชำระเงิน</p>
											<!--begin::Wrapper-->
											<div style="background: #F9F9F9; border-radius: 12px; padding:35px 30px">
												<!--begin::Item-->
												<div style="display:flex">
													<!--begin::Media-->
													<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
														<span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">1</span>
													</div>
													<!--end::Media-->
													<!--begin::Block-->
													<div>
														<!--begin::Content-->
														<div>
															<!--begin::Title-->
															<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">การแจ้งชำระเงินผ่านเว็บไซต์</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">กดปุ่มสีแดง "แจ้งการชำระเงิน" จากนั้นกรอก หมายเลขคำสั่งจอง และ แนบสลิปชำระเงิน รอเจ้าหน้าที่ตรวจสอบ</p>
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Separator-->
														<div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
														<!--end::Separator-->
													</div>
													<!--end::Block-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div style="display:flex">
													<!--begin::Media-->
													<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
														<span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">2</span>
													</div>
													<!--end::Media-->
													<!--begin::Block-->
													<div>
														<!--begin::Content-->
														<div>
															<!--begin::Title-->
															<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">หรือ การแจ้งชำระเงินผ่าน Line</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                                                                เพิ่มเพื่อนผ่านไลน์  <a href="https://lin.ee/dMesavY" class='text-success'>https://lin.ee/dMesavY</a> จากนั้นแจ้ง หมายเลขคำสั่งจอง และ แนบสลิปชำระเงิน รอเจ้าหน้าที่ตรวจสอบ
                                                            </p>
															<!--end::Desc-->
														</div>
														<!--end::Content-->
														<!--begin::Separator-->
														<div class="separator separator-dashed" style="margin:17px 0 15px 0"></div>
														<!--end::Separator-->
													</div>
													<!--end::Block-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div style="display:flex">
													<!--begin::Media-->
													<div style="display: flex; justify-content: center; align-items: center; width:40px; height:40px; margin-right:13px">
														<span style="position: absolute; color:#50CD89; font-size: 16px; font-weight: 600;">3</span>
													</div>
													<!--end::Media-->
													<!--begin::Block-->
													<div>
														<!--begin::Content-->
														<div>
															<!--begin::Title-->
															<a href="#" style="color:#181C32; font-size: 14px; font-weight: 600;font-family:Arial,Helvetica,sans-serif">ตรวจสอบข้อมูลสำเร็จ</a>
															<!--end::Title-->
															<!--begin::Desc-->
															<p style="color:#5E6278; font-size: 13px; font-weight: 500; padding-top:3px; margin:0;font-family:Arial,Helvetica,sans-serif">
                                                                เมื่อเจ้าหน้าที่ตรวจสอบแล้ว เราจะทำการส่ง QR Code และข้อมูลการเข้าร่วมงานให้กับทางอีเมลของท่าน ในวันร่วมงานให้นำ QR Code มาเช็คอินเข้างานและร่วมกิจกรรมสนุกๆกับทางเรา
                                                            </p>
															<!--end::Desc-->
														</div>
														<!--end::Content-->
													</div>
													<!--end::Block-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Wrapper-->
										</td>
									</tr>
									<tr >
										<td align="center" valign="center" style="text-align:center; padding:0 60px 35px 60px">
											<h3 style="text-align:center; color:#181C32; font-size: 18px; font-weight:600; margin-bottom: 22px">หมายเลขคำสั่งจอง : {{$details['order_id']}}</h3>
											<table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
												<tbody>
												
													<tr>
														<td style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" width="49%">{{$details['seatDetails']}} Tickets
														</td>
														<td style="text-align:right;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" width="49%">
															
																<a style="text-decoration:none;color:#7E8299" >ราคา {{$details['price']}}</a>
															
														</td>
													</tr>
													<tr>
														<td style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" width="49%">Total
														</td>
														<td style="text-align:right;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" width="49%"> ราคา {{$details['price']}}
														</td>
													</tr>
													<tr>
														<td colspan="2" height="20" style="font-size:1px;line-height:1px" width="100%">
															<hr>
														</td>
													</tr>
				
												</tbody>
											</table>
										</td>
									</tr>
									<tr style="">
										<td align="center" valign="center" style="text-align:center; padding:0 60px 35px 60px">
											<h3 style="text-align:center; color:#181C32; font-size: 18px; font-weight:600; margin-bottom: 22px">รายละเอียดผู้สั่งจอง</h3>
											<table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
												<tbody>
												
													<tr>
														<td style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" 
														width="49%">ชื่อ-นามสกุล
														</td>
														<td style="text-align:right;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" width="49%">
															
																<a style="text-decoration:none;color:#7E8299" >{{$details['name']}}</a>
															
														</td>
													</tr>
													<tr>
														<td style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" 
														width="49%">อีเมล
														</td>
														<td style="text-align:right;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" width="49%">
															
																<a style="text-decoration:none;color:#7E8299" >{{$details['email']}}</a>
															
														</td>
													</tr>
													<tr>
														<td style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" 
														width="49%">เบอร์ติดต่อ
														</td>
														<td style="text-align:right;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" width="49%">
															
																<a style="text-decoration:none;color:#7E8299" >{{$details['phone']}}</a>
															
														</td>
													</tr>
													<tr>
														<td style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" 
														width="49%">Line ID
														</td>
														<td style="text-align:right;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top;word-break:break-word" width="49%">
															
																<a style="text-decoration:none;color:#7E8299" >{{$details['line_id']}}</a>
															
														</td>
													</tr>
													<tr>
														<td colspan="2" height="20" style="font-size:1px;line-height:1px" width="100%">
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
											<hr>
											<img src="{{ url('img/154930.png') }}" style="width:90%; margin-bottom: 20px; margin-top: 20px;">
											<p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">Customer Support</p>
											<p>หากมีข้อสงสัยเพิ่มเติมหรือต้องการความช่วยเหลือ ติดต่อ <br> วันจันทร์-อาทิตย์ หยุดวันเสาร์ 10:00 – 18:00 น.</p>
											<p style="margin-bottom:4px">Facebook Page
											<a href="https://www.facebook.com/hobf.thailand2" rel="noopener" target="_blank" style="font-weight: 600">Second chance</a>.</p>
                                            <p style="margin-bottom:4px">Line@
                                                <a href="https://lin.ee/dMesavY" rel="noopener" target="_blank" style="font-weight: 600">https://lin.ee/dMesavY</a>
											</p>
											
										</td>
									</tr>
									<tr>
										<td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
												<div style="margin-bottom: 10px">
													<a href="#" rel="noopener" target="_blank">
														<img alt="line" src="{{ url('img/Image_29.png') }}" style="height: 160px; width:160px" />
													</a>
												</div>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
					<!--end::Email template-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Wrapper-->
		</div>
	</body>
	<!--end::Body-->
</html>