{# index.volt #}
{% extends "layouts/layout.volt" %}

{% block content %}

    {{ super() }}

    <ul>
        <li>Some option</li>
        <li>Some other option</li>
        <li>{{ link_to("login/logout", "Logout") }}</li>
    </ul>

{% endblock %}