hello {{$user->name}}
thank u foe creatiinf the acccount please verify your email using this link:
{{route('verify',$user->verification_token)}}