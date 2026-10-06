<?php
/**
 * Title: Leaderboard
 * Slug: nexus/leaderboard
 * Categories: nexus
 * Keywords: leaderboard, ranking, players, table
 * Block Types: core/group
 */
?>

<!-- wp:group {"className":"nexus-reveal","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group nexus-reveal" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"fontFamily":"display"} -->
	<h2 class="wp-block-heading has-display-font-family">🏆 Season Leaderboard</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"textColor":"muted","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
	<p class="has-muted-color" style="margin-bottom:var(--wp--preset--spacing--40)">Top-ranked competitors this season. Updated every Sunday at reset.</p>
	<!-- /wp:paragraph -->

	<!-- wp:table {"style":{"border":{"radius":"16px"}}} -->
	<figure class="wp-block-table" style="border-radius:16px"><table>
		<thead><tr><th>Rank</th><th>Player</th><th>Team</th><th>Wins</th><th>Win Rate</th><th>Points</th></tr></thead>
		<tbody>
			<tr><td><strong class="has-neon-lime-color">01</strong></td><td><strong>VexPlays</strong></td><td>Nova Strike</td><td>312</td><td>78%</td><td><strong class="has-neon-lime-color">9,840</strong></td></tr>
			<tr><td><strong class="has-neon-cyan-color">02</strong></td><td><strong>PixelQueen</strong></td><td>Nova Strike</td><td>298</td><td>74%</td><td><strong>9,512</strong></td></tr>
			<tr><td><strong class="has-neon-pink-color">03</strong></td><td><strong>GhostRider_X</strong></td><td>Void Walkers</td><td>287</td><td>71%</td><td><strong>9,204</strong></td></tr>
			<tr><td><strong>04</strong></td><td><strong>NoScopeNina</strong></td><td>Iron Wolves</td><td>265</td><td>68%</td><td><strong>8,877</strong></td></tr>
			<tr><td><strong>05</strong></td><td><strong>TurboTactics</strong></td><td>Void Walkers</td><td>259</td><td>66%</td><td><strong>8,650</strong></td></tr>
			<tr><td><strong>06</strong></td><td><strong>LootGoblin</strong></td><td>Pixel Pandas</td><td>244</td><td>63%</td><td><strong>8,310</strong></td></tr>
			<tr><td><strong>07</strong></td><td><strong>ClutchKing</strong></td><td>Iron Wolves</td><td>238</td><td>62%</td><td><strong>8,102</strong></td></tr>
			<tr><td><strong>08</strong></td><td><strong>NeonNadia</strong></td><td>Pixel Pandas</td><td>231</td><td>60%</td><td><strong>7,944</strong></td></tr>
		</tbody>
	</table></figure>
	<!-- /wp:table -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/leaderboard/">Full Rankings</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
