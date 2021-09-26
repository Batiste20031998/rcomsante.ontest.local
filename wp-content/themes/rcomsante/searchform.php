<form action="<?= esc_url(home_url('/')) ?>">
    <input type="search" name="s" value="<?= get_search_query(); ?>">
    <button type="submit">Rechercher</button>
</form>