<!-- Pager -->
<ul class="pager">
    <li class="previous">
        {% if current_page < (posts_count-1) %}
        <a href="/p/{{current_page+1}}">←  Older</a>
        {% else %}
        <span>←  Older</span>
        {% endif %}
    </li>
    <li class="next">
        {% if current_page > 0  %}
        <a href="{% if current_page == 1 %} / {% else %} /p/{{current_page-1}} {% endif %}">Newer →</a>
        {% else %}
        <span>Newer →</span>
        {% endif %}
    </li>
</ul>
