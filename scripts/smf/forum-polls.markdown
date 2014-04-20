---
layout: default
title: Запросы для SMF
header:
    <link href="/css/pygments.css" rel="stylesheet" type="text/css" />
---

по положительной карме

{% highlight mysql %}
SELECT SUM(karmaGood), lp.ID_CHOICE
FROM log_polls lp
  JOIN members m ON (m.ID_MEMBER = lp.ID_MEMBER)
WHERE lp.ID_POLL = ?
GROUP BY lp.ID_CHOICE
{% endhighlight %}

по дате регистрации

{% highlight mysql %}
SELECT SUM((UNIX_TIMESTAMP() - dateRegistered)/60/60/24), lp.ID_CHOICE
FROM log_polls lp
  JOIN members m ON (m.ID_MEMBER = lp.ID_MEMBER)
WHERE lp.ID_POLL = ?
GROUP BY lp.ID_CHOICE;
{% endhighlight %}

по количеству постов

{% highlight mysql %}
SELECT SUM(posts), lp.ID_CHOICE
FROM log_polls lp
  JOIN members m ON (m.ID_MEMBER = lp.ID_MEMBER)
WHERE lp.ID_POLL = ?
GROUP BY lp.ID_CHOICE;
{% endhighlight %}

по уникальным айпишникам

{% highlight mysql %}
SELECT COUNT(DISTINCT(memberIP)), lp.ID_CHOICE
FROM log_polls lp
  JOIN members m ON (m.ID_MEMBER = lp.ID_MEMBER)
WHERE lp.ID_POLL = ?
GROUP BY lp.ID_CHOICE;
{% endhighlight %}

