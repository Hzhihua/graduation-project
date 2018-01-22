<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-22 11:22
 * @Github: https://github.com/Hzhihua
 */
/* @var $copyright string */
/* @var $footer string */
?>

<div class="post-card">
    <h1 class="post-card-title">二分查找法</h1>
    <div class="post-meta">
        <time class="post-time" title="2017-10-28 12:59:23" datetime="2017-10-28T04:59:23.000Z" itemprop="datePublished">2017-10-28</time>


        <ul class="article-category-list"><li class="article-category-list-item"><a class="article-category-list-link" href="http://blog.hzhihua.top/categories/%E7%AE%97%E6%B3%95-%E7%AC%AC%E5%9B%9B%E7%89%88/">算法(第四版)</a></li></ul>




        <span id="busuanzi_container_page_pv" title="文章总阅读量" style="display: inline;">
    <i class="icon icon-eye icon-pr"></i><span id="busuanzi_value_page_pv">7</span>
</span>


    </div>
    <div class="post-content" id="post-content" itemprop="postContent">
        <h1 id="二分查找法"><a href="#二分查找法" class="headerlink" title="二分查找法"></a>二分查找法</h1><p>假设你要在电话簿中查找一个以K开头的名字（现在谁还用电话簿！），可以从头开始翻页，一直翻到以K开头的部分。但是你应该不会这样做，而是直接从中间开始查找，因为你知道以K开头的名字在电话簿中间。</p>
        <p>现在假设你要登录Facebook。当你登录的时候，Facebook肯定会核实一下你的账号是否在Facebook上注册过。假设你的用户名为Karlmageddon，Facebook可以从以A开头的部分开始查找，但是更符合逻辑的方法是从中间找起。</p>
        <p>这是一个查找问题，在以上所描述的所有情况下，都可以使用同一种算法来解决问题，这中算法就是<em>二分查找</em> 。</p>
        <h2 id="什么是二分查找法"><a href="#什么是二分查找法" class="headerlink" title="什么是二分查找法"></a>什么是二分查找法</h2><p>在一个 <em>有序数组</em> (必须是有序数组)中查找某一个特定元素的算法。搜索过程从中间开始，如果中间元素正好是要搜索的元素，则搜索过程结束。如果中间元素大于要搜索的元素，则在小于中间元素的另一半中查找。若中间元素小于要搜索的元素，则在大于中间元素的另一半中查找。</p>
        <h2 id="图解"><a href="#图解" class="headerlink" title="图解"></a>图解</h2><figure class="image-bubble">
            <div class="img-lightbox">
                <div class="overlay"></div>
                <img src="static/Binary_search_into_array.png" alt="二分查找图解" title="">
            </div>
            <div class="image-caption">二分查找图解</div>
        </figure>
        <h2 id="代码实现"><a href="#代码实现" class="headerlink" title="代码实现"></a>代码实现</h2><figure class="highlight java"><table><tbody><tr><td class="gutter"><pre><div class="line">1</div><div class="line">2</div><div class="line">3</div><div class="line">4</div><div class="line">5</div><div class="line">6</div><div class="line">7</div><div class="line">8</div><div class="line">9</div><div class="line">10</div><div class="line">11</div><div class="line">12</div><div class="line">13</div><div class="line">14</div><div class="line">15</div><div class="line">16</div><div class="line">17</div><div class="line">18</div><div class="line">19</div><div class="line">20</div><div class="line">21</div><div class="line">22</div><div class="line">23</div><div class="line">24</div><div class="line">25</div><div class="line">26</div><div class="line">27</div><div class="line">28</div></pre></td><td class="code"><pre><div class="line"><span class="keyword">public</span> <span class="class"><span class="keyword">class</span> <span class="title">BinarySearch</span></span></div><div class="line"><span class="class"></span>{</div><div class="line">    <span class="comment">/**</span></div><div class="line"><span class="comment">     * 查找指定元素是否存在有序数组中</span></div><div class="line"><span class="comment">     * <span class="doctag">@param</span>  int key 要查找的元素</span></div><div class="line"><span class="comment">     * <span class="doctag">@param</span>  array a 有序数组</span></div><div class="line"><span class="comment">     * <span class="doctag">@return</span> 查找成功返回指定索引的位置，失败返回 -1</span></div><div class="line"><span class="comment">     */</span></div><div class="line">    <span class="function"><span class="keyword">public</span> <span class="keyword">static</span> <span class="keyword">int</span> <span class="title">search</span><span class="params">(<span class="keyword">int</span> key, <span class="keyword">int</span>[] a)</span></span></div><div class="line"><span class="function">    </span>{</div><div class="line">        <span class="comment">// 数组必须是有序的</span></div><div class="line">        <span class="keyword">int</span> lo = <span class="number">0</span>;</div><div class="line">        <span class="keyword">int</span> hi = a.length - <span class="number">1</span>; <span class="comment">// 获取数组的最大索引</span></div><div class="line">        <span class="keyword">int</span> mid = <span class="number">0</span>; <span class="comment">// 中间元素索引</span></div><div class="line">        <span class="keyword">while</span> (lo &lt;= hi)</div><div class="line">        {</div><div class="line">            mid = lo + (hi - lo) / <span class="number">2</span>;</div><div class="line">            <span class="keyword">if</span> (a[mid] == key)</div><div class="line">              <span class="keyword">return</span> mid;</div><div class="line">            <span class="keyword">if</span> (a[mid] &gt; key)</div><div class="line">              hi = mid - <span class="number">1</span>;</div><div class="line">            <span class="keyword">else</span> <span class="keyword">if</span> (a[mid] &lt; key)</div><div class="line">              lo = mid + <span class="number">1</span>;</div><div class="line">        }</div><div class="line"></div><div class="line">        <span class="keyword">return</span> -<span class="number">1</span>;</div><div class="line">    }</div><div class="line">}</div></pre></td></tr></tbody></table></figure>
        <h2 id="增长数量级分类"><a href="#增长数量级分类" class="headerlink" title="增长数量级分类"></a>增长数量级分类</h2><blockquote>
            <p> 此算法属于 <em>对数级别(logN)</em> log底数为2 </p>
        </blockquote>
        <h2 id="说明"><a href="#说明" class="headerlink" title="说明"></a>说明</h2><blockquote>
            <p>位于算法(第四版)28页</p>
        </blockquote>

    </div>

    <?= $copyright //版权信息 ?>
    <?= $footer //文章分类信息 ?>
</div>