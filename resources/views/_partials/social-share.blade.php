<ul class="social">
    <li class="social-twitter">
        <a href="https://twitter.com/intent/tweet?text={{ $social['title'] }}&url={{ request()->url() }}"
           onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=420,width=550');return false;"
           title="Twitter" target="_blank"><i class="fa fa-twitter icon-2x" aria-hidden="true">&nbsp;</i></a>
    </li>
    <li class="social-facebook">
        <a href="http://www.facebook.com/sharer.php?s=100&p[title]={{ $social['title'] }}&p[summary]={{ $social['des'] }}&p[url]={{ request()->url() }}&p[images][0]={{ $social['thumbnails'] }},"
           onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=350,width=520');return false;"
           title="Facebook" target="_blank"><i class="fa fa-facebook icon-2x">&nbsp;</i></a>
    </li>
    <li class="social-pinterest">
        <a href="http://www.pinterest.com/pin/create/button?url={{ request()->url() }}&media={{ $social['thumbnails'] }}&description={{ $social['title'] }}"
           onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=650,width=1024');return false;"
           title="Pinterest" target="_blank"><i class="fa fa-pinterest-p icon-2x">&nbsp;</i>
        </a>
    </li>
    <li class="social-google">
        <a href="https://plus.google.com/share?url={{ request()->url() }}"
           onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=600,width=600');return false;"
           title="Google+" target="_blank"><i class="fa fa-google-plus icon-2x">&nbsp;</i></a>
    </li>
    <li class="social-linkedin">
        <a  href="https://www.linkedin.com/cws/share?url={{ request()->url() }}"
            onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=420,width=550');return false;"
            title="Pinterest" target="_blank"><i class="fa fa-linkedin icon-2x">&nbsp;</i>
        </a>
    </li>
</ul>

