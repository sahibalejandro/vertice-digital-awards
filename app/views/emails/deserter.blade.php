<p>Hey {{{ $user->name }}}!</p>

<p>No te olvides de participar en los Vértice Digital Awards 2014, ya queda poco tiempo para cerrar las votaciones.</p>

<p>Tu participación es muy importante, tus compañeros ya votaron ¡faltas tú!</p>

<p>
    <a href="{{ route('login.attempt', $user->uuid) }}">¡Pincha este link para votar ya!</a>, solo te tomará 2 minutos.
</p>
