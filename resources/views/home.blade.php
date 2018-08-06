@extends('layouts.app')

@section('content')
<div id="colorlib-hero" class="js-fullheight">
				<div class="item">
					<div class="hero-flex js-fullheight">
						<div class="col-three-forth">
							<div class="hero-img js-fullheight" style="background-image: url(images/night-img.jpg);margin-top:-15px;"></div>
						</div>
						<div class="col-one-forth js-fullheight" style="background-image: url(images/night-img-2.jpg);margin-top:-15px;">
							<div class="display-t js-fullheight">
								<div class="display-tc js-fullheight">
									<h2 class="number">08/06</h2>
									<div class="text-inner">
										<div class="desc" style="color:#fff;">
											<span class="tag">Welcome</span>
											<h2 >Easy sender.</h2>
											<p>Batata Makliya</p>
											<p><a href="{{ route('sender') }}" class="btn-view" style="color:#fff;">Start using sender<i class="icon-arrow-right3"></i></a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>			
				</div>
			</div>
		</div>
	</div>

@endsection
