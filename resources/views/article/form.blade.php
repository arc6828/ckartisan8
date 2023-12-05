<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($article->title) ? $article->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="link" type="text" id="link" value="{{ isset($article->link) ? $article->link : ''}}" >
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('guid') ? 'has-error' : ''}}">
    <label for="guid" class="control-label">{{ 'Guid' }}</label>
    <input class="form-control" name="guid" type="text" id="guid" value="{{ isset($article->guid) ? $article->guid : ''}}" >
    {!! $errors->first('guid', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'Category' }}</label>
    <input class="form-control" name="category" type="text" id="category" value="{{ isset($article->category) ? $article->category : ''}}" >
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('creator') ? 'has-error' : ''}}">
    <label for="creator" class="control-label">{{ 'Creator' }}</label>
    <input class="form-control" name="creator" type="text" id="creator" value="{{ isset($article->creator) ? $article->creator : ''}}" >
    {!! $errors->first('creator', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pubDate') ? 'has-error' : ''}}">
    <label for="pubDate" class="control-label">{{ 'Pubdate' }}</label>
    <input class="form-control" name="pubDate" type="datetime-local" id="pubDate" value="{{ isset($article->pubDate) ? $article->pubDate : ''}}" >
    {!! $errors->first('pubDate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contentEncoded') ? 'has-error' : ''}}">
    <label for="contentEncoded" class="control-label">{{ 'Contentencoded' }}</label>
    <textarea class="form-control" rows="5" name="contentEncoded" type="textarea" id="contentEncoded" >{{ isset($article->contentEncoded) ? $article->contentEncoded : ''}}</textarea>
    {!! $errors->first('contentEncoded', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image_url') ? 'has-error' : ''}}">
    <label for="image_url" class="control-label">{{ 'Image Url' }}</label>
    <input class="form-control" name="image_url" type="text" id="image_url" value="{{ isset($article->image_url) ? $article->image_url : ''}}" >
    {!! $errors->first('image_url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('first_paragraph') ? 'has-error' : ''}}">
    <label for="first_paragraph" class="control-label">{{ 'First Paragraph' }}</label>
    <input class="form-control" name="first_paragraph" type="text" id="first_paragraph" value="{{ isset($article->first_paragraph) ? $article->first_paragraph : ''}}" >
    {!! $errors->first('first_paragraph', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('credit') ? 'has-error' : ''}}">
    <label for="credit" class="control-label">{{ 'Credit' }}</label>
    <input class="form-control" name="credit" type="text" id="credit" value="{{ isset($article->credit) ? $article->credit : ''}}" >
    {!! $errors->first('credit', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
