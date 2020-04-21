from django.shortcuts import render , redirect
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth import login,authenticate
from .models import Profile
# Create your views here.


def home(request):
    pass


def register(request):

    if request.method == 'POST':
        form = UserCreationForm(request.POST)
        if form.is_valid():
            form.save()
            username = form.cleaned_data.get('username')
            password = form.cleaned_data.get('password1')
            user = authenticate(username=username, password=password)
            login(request, user)
            return redirect('/notes')

    else :
        form = UserCreationForm()


    context ={
            'form' : form,
    }

    return render(request, 'signup.html', context)


def profile(request, slug):
    profile = Profile.objects.get(slug=slug)
    context = {
        profile : 'profile'
    }
    return render(request,'profile.html',context)


def edit_profile():
    pass
