
<link rel="stylesheet" href="{{asset('site/css/about.css')}}">   
  <div class="col-lg-8">
                <div class="bg-right">
                    <h3>{{ getDataContent($mod, 'title', getCurrentLang()) }}</h3>

                    <p>{!! getDataContent($mod, 'desc', getCurrentLang()) !!}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details">
                    <h5>{{ getSettings() }}</h5>
                    <p><i class="fas fa-map-marker-alt"></i>  المصنع : {{ getSettings('site_address_fectory') }}</p>
                    <p>الإدارة : {{ getSettings('site_address_mange') }}</p>
                    <h3>تليفون : </h3>
                    <p><i class="fas fa-phone"></i>  موبــايل : {{ getSettings('site_phone') }} </p>
                    <p>تــليفوت أرضى : {{ getSettings('site_tel') }}</p>
                </div>
            </div>