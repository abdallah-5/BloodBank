from django.conf.urls import url
from . import views
from django.contrib.auth.views import LoginView,LogoutView
app_name='accounts'

urlpatterns = [
    url(r'^$', views.home , name='home'),
    url(r'^login/$', LoginView.as_view(template_name='login.html'), name="login"),
    url(r'^logout$', LogoutView),
    url(r'^signup$', views.register, name='register'),
    url(r'^(?P<slug>[-\w]+)/$', views.profile, name='profile'),
    url(r'^(?P<slug>[-\w]+)/edit$', views.edit_profile, name='edit_profile'),


]
